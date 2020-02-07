<?

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

        $cek_user = $this->db->query("
        SELECT
        id,
        username,
        password,
        role_id
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
                    $response = [
                        'error' => false,
                        'message' => 'Success login!',
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
        $this->_sendEmail($email, $token, 'verify');

        $response = [
            'error' => false,
            'message' => 'Akun anda sudah dibuat. Silahkan aktivasi akun anda!'
        ];
        goto output;

        output: return $response;
    }

    private function _sendEmail($email, $token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'albedrizki013@gmail.com',
            'smtp_pass' => 'pojareaku13',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('albedrizki013@gmail.com', 'Besaf Management');
        $this->email->to($email);

        if ($type == 'verify') {
            $message = 'Akun anda ' . $email . ' telah diverifikasi! Silahkan <a href="' . $_SERVER['SERVER_NAME'] . '/auth/verify/' . urlencode($token) . '">login</a>.';
            $this->email->subject('Account Verification');
            $this->email->message($message);
        } elseif ($type == 'forgot') {
            $message = 'developer salah alamat';
            $this->email->subject('Reset Password');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
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
}
