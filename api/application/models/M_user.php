<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH . 'vendor/autoload.php';

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($post)
    {
        $usemail = $post['usernameEmail'];
        $password = $post['password'];

        // untuk diproses disini
        $cek_user = $this->db->query("
        SELECT
        id,
        username,
        email,
        password,
        role_id,
        is_active
        FROM
            user
        WHERE
            username = '$usemail' OR email = '$usemail'
        ");

        // jika username atau email belum diisi
        if (!$usemail) {
            $response = [
                'error' => true,
                'message' => 'Username atau email belum diisi!'
            ];
            goto output;
        } elseif (!$password) {
            $response = [
                'error' => true,
                'message' => 'Password belum diisi!'
            ];
            goto output;
        }

        // cek user
        if ($cek_user->num_rows() > 0) {
            // user ada
            foreach ($cek_user->result_array() as $user) {
                if (password_verify($password, $user['password'])) {
                    // password benar

                    // periksa kalau user belum aktif
                    if ($user['is_active'] == 0) {
                        $response = [
                            'error' => true,
                            'message' => 'Akun anda ' . $user['email'] . ' belum diverifikasi. Silahkan cek email anda.'
                        ];
                        goto output;
                    }
                    $response = [
                        'error' => false,
                        'message' => 'Success login!',
                        // dikirim untuk session
                        'data' => [
                            'role_id' => $user['role_id'],
                            'username' => $user['username'],
                            'id' => $user['id']
                        ]
                    ];
                    goto output;
                } else {
                    // password salah
                    $response = [
                        'error' => true,
                        'message' => 'Password salah!'
                    ];
                    goto output;
                }
            }
        } else {
            // user tidak ada
            $response = [
                'error' => true,
                'message' => 'Username tidak ditemukan!'
            ];
            goto output;
        }
        output: return $response;
    }

    // ────────────────────────────────────────────────────────────────────────────────

    public function registrasi($post)
    {
        // sudah di filter
        $fullname = htmlspecialchars(trim(strip_tags($post['fullname'])));
        $username = htmlspecialchars(trim(strip_tags($post['username'])));
        $email = htmlspecialchars(trim(strip_tags($post['email'])));
        $password = htmlspecialchars(trim(strip_tags($post['password'])));
        $verifypassword = htmlspecialchars(trim(strip_tags($post['verifypassword'])));
        $country = htmlspecialchars(trim(strip_tags($post['country'])));
        $role_id = 1; #user
        $is_active = 0; #belum aktif
        $cek_email = $this->db->get_where('user', ['email' => $email])->row_array();

        if (!$fullname) {
            $response = [
                'error' => true, 'message' => 'Fullname belum diisi!'
            ];
            goto output;
        } elseif (!$username) {
            $response = [
                'error' => true, 'message' => 'Username belum diisi!'
            ];
            goto output;
        } elseif ($cek_email) {
            $response = [
                'error' => true, 'message' => 'Email sudah dipakai! ganti gan...'
            ];
            goto output;
        } elseif (!$email) {
            $response = [
                'error' => true, 'message' => 'Email belum diisi!'
            ];
            goto output;
        } elseif (!$password) {
            $response = [
                'error' => true, 'message' => 'Password belum diisi!'
            ];
            goto output;
        } elseif ($password !== $verifypassword) {
            $response = [
                'error' => true, 'message' => 'Password tidak sama!'
            ];
            goto output;
        } elseif (!$country) {
            $response = [
                'error' => true, 'message' => 'Country belum diisi!'
            ];
            goto output;
        }

        // cek user ada atau tidak
        $cek_username = $this->db->get_where('user', ['username' => $username]);
        if ($cek_username->num_rows() > 0) {
            $response = [
                'error' => true,
                'message' => 'Username sudah dipakai orang lain.'
            ];
            goto output;
        }

        // verification
        $token = base64_encode($email);
        $user_token = [
            'email' => $email,
            'token' => $token
        ];

        $data = [
            'username' => $username,
            'email' => $email, 'full_name' => $fullname, 'password' => password_hash($password, PASSWORD_DEFAULT), 'country' => $country, 'role_id' => $role_id, 'is_active' => $is_active
        ];

        // insert
        $this->db->insert('user', $data); // user
        $this->db->insert('user_token', $user_token); //user_token

        if ($this->_sendEmail($email, $token, 'verify') == true) {
            $response = [
                'error' => false,
                'message' => 'Akun anda sudah dibuat. Silahkan aktivasi akun anda!'
            ];
            goto output;
        } else {
            $response = [
                'error' => true,
                'message' => 'Ada kesalahan saat mengirim email.'
            ];
            goto output;
        }


        output: return $response;
    }

    private function _sendEmail($email, $token, $type)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'albedrizki013@gmail.com';
        $mail->Password = 'pojareaku13';
        $mail->setFrom('albedrizki013@gmail.com', 'BESAF');
        $mail->addAddress($email);
        $mail->isHTML(true);

        if ($type == 'verify') {
            $message = 'Terimakasih sudah mendaftarkan Akun anda ' . $email . ' di BESAF. Silahkan verifikasi akun anda untuk login ke akun BESAF anda, dengan meng-klik tombol <a href="https://' . $_SERVER['SERVER_NAME'] . '/auth/verify/' . urlencode($token) . '">verifikasi</a>.';
            $mail->Subject = 'BESAF Account Verification';
            $mail->Body = $message;
        } elseif ($type == 'forgot') {
            $message = 'Apakah anda kehilangan kata sandi akun ' . $email . ' anda? . Silahkan ganti kata sandi akun anda untuk login ke akun BESAF anda, dengan meng-klik tombol <a href="https://' . $_SERVER['SERVER_NAME'] . '/auth/resetpassword/' . urlencode($token) . '">Change my password</a>.';
            $mail->Subject = 'BESAF Reset Password';
            $mail->Body = $message;
        }

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    public function verify($post)
    {
        // * Verifikasi email user
        $verifycode = urldecode($post['verificationcode']);

        $email = base64_decode($verifycode);
        $user = $this->db->get_where('user_token', ['token' => $verifycode])->row_array();

        if ($user) {
            // kalau token cocok
            $this->db->delete('user_token', ['token' => $verifycode]);
            // update is_active
            $this->db->update('user', ['is_active' => 1], ['email' => $email]);

            $response = [
                'error' => false,
                'message' => "Akun $email berhasil diaktivasi. Silahkan login untuk lanjutkan...!"
            ];
            goto output;
        } else {
            // kalau token tidak cocok
            $this->db->delete('user_token', ['token' => $verifycode]);

            $response = [
                'error' => true,
                'message' => "Akun $email sebelumnya sudah diaktivasi. Silahkan login untuk lanjutkan...!"
            ];
            goto output;
        }
        output: return $response;
    }

    public function forgotpassword($post)
    {
        // * Verifikasi email user
        $email = $post['email'];
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $token = [
            'token' => base64_encode($email),
            'email' => $email
        ];

        if (!$email) {
            // belum diisi
            $response = [
                'error' => true,
                'message' => "Emailnya diisi dulu lurr..."
            ];
            goto output;
        } elseif (!$user) {
            // tidak ada user
            $response = [
                'error' => true,
                'message' => "Akun $email belum terdaftar. Silahkan daftar dulu gan..."
            ];
            goto output;
        } else {
            // user ada
            if ($this->_sendEmail($email, $token['token'], 'forgot') == true) {
                $this->db->insert('user_token', $token);
                $response = [
                    'error' => false,
                    'message' => "Akun $email terverifikasi. Silahkan cek email anda untuk mendapatkan link.",
                ];
                goto output;
            } else {
                $mail = new PHPMailer();
                $response = [
                    'error' => true,
                    'message' => 'mailer error: ' . $mail->ErrorInfo
                ];

                goto output;
            }
        }
        output: return $response;
    }

    public function changePassword($post)
    {
        $password = $post['password'];
        $newpassword = $post['verifypassword'];
        $email = $post['email'];
        $cek_email = $this->db->get_where('user', ['email' => base64_decode(urldecode($email))])->row_array();

        if ($email !== $cek_email) {
            $response = [
                'error' => 'undefined',
                'message' => 'Anda mungkin tersesat! Silahkan pulang ke dashboard :) '
            ];
            goto output;
        } elseif (!$password) {
            $response = [
                'error' => true,
                'message' => 'Password kosong!'
            ];
            goto output;
        } elseif (!$newpassword) {
            $response = [
                'error' => true,
                'message' => 'Lengkapi password anda!'
            ];
            goto output;
        } elseif ($password !== $newpassword) {
            $response = [
                'error' => true,
                'message' => 'Password tidak sama!'
            ];
            goto output;
        }

        $this->db->delete('user_token', ['email' => $email]);
        $this->db->update('user', ['password' => password_hash($newpassword, PASSWORD_DEFAULT)], ['email' => $email]);
        $response = [
            'error' => false,
            'message' => "User dengan email: " . $email . " password berhasil di-update! Silahkan <a href=https://" . $_SERVER['SERVER_NAME'] . '/auth/login' . ">login</a>"
        ];
        goto output;

        output: return $response;
    }

    public function notifikasi($input)
    {
        $user_id = $input['user_id'];

        if (empty($user_id)) {
            $hasil = array(
                'error' => true,
                'message' => "user_id tidak ditemukan."
            );
            goto output;
        }

        $notif = $this->db->query("
            SELECT 
                id,
                pesan,
                type,
                created_at,
                komunitas_id,
                team_id
            FROM 
                notifikasi
            WHERE
                user_id = '$user_id'
            ");

        $hasil['error'] = false;
        $hasil['message'] = "data belum tersedia.";

        $no = 0;
        foreach ($notif->result_array() as $key) {
            $hasil['error'] = false;
            $hasil['message'] = "notifikasi tersedia.";
            $hasil['data'][$no++] = $key;
        }

        output:
        return $hasil;
    }

    public function konfirmasi($input)
    {
        $user_id = $input['user_id'];
        $komunitas_id = $input['komunitas_id'];
        $team_id = $input['team_id'];

        if (empty($user_id)) {
            $hasil = array(
                'error' => true,
                'message' => "user_id tidak ditemukan."
            );
            goto output;
        } else if (empty($komunitas_id) && empty($team_id)) {
            $hasil = array(
                'error' => true,
                'message' => "kesalahan."
            );
            goto output;
        }

        if ($team_id) {
            $this->db->query("
                UPDATE 
                    team_member
                SET 
                    status = '1'
                WHERe 
                    user_id = '$user_id' AND team_id = '$team_id'
                ");
        }

        $hasil = array(
            'error' => false,
            'message' => "sukses."
        );

        output: 
        return $hasil;
    }
}
