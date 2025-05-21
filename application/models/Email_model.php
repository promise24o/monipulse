<?php
class Email_model extends CI_Model
{
   private function _initialize_email_config()
    {
        $config = [];
    
        if ($this->config->item('protocol') === 'smtp') {
            $config['protocol']     = $this->config->item('protocol');
            $config['smtp_host']    = $this->config->item('smtp_host'); // not smtp_hostname
            $config['smtp_user']    = $this->config->item('smtp_user'); // not smtp_username
            $config['smtp_pass']    = $this->config->item('smtp_pass'); // not smtp_password
            $config['smtp_port']    = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout') ?: 30;
            $config['smtp_crypto']  = $this->config->item('smtp_crypto') ?: 'ssl';
            $config['mailtype']     = $this->config->item('mailtype') ?: 'text';
            $config['charset']      = $this->config->item('charset') ?: 'utf-8';
            $config['newline']      = $this->config->item('newline') ?: "\r\n";
            $config['wordwrap']     = $this->config->item('wordwrap') ?: true;
            $config['send_multipart'] = FALSE;

    
            $this->email->initialize($config);
            $this->email->set_newline($config['newline']);
        }
    
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
    
    }

    public function account_confirmation($user_email, $user_name = 'User', $confirmation_link = '#') {
        $this->_initialize_email_config();

        $from_email = $this->config->item('from_email_address') ?: "support@mimivsapp.com";
        $from_name  = $this->config->item('from_email_name') ?: "Mimisv App";
        $subject    = "Account Confirmation - " . $from_name;

        $message_body = "
            <html>
            <head>
                <title>Account Confirmation</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
                    .container { background-color: #ffffff; padding: 20px; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <p>Hello " . htmlspecialchars($user_name) . ",</p>
                    <p>Thank you for registering with " . htmlspecialchars($from_name) . ".</p>
                    <p>Please click the link below to confirm your account:</p>
                    <p><a href='" . htmlspecialchars($confirmation_link) . "'>Confirm Your Account</a></p>
                    <p>If you did not create an account, please ignore this email.</p>
                    <br>
                    <p>Thank you,</p>
                    <p>The " . htmlspecialchars($from_name) . " Team</p>
                </div>
            </body>
            </html>";

        $this->email->to($user_email);
        $this->email->from($from_email, $from_name);
        $this->email->subject($subject);
        $this->email->message($message_body);

        if (!$this->email->send()) {
            log_message('error', "Account Confirmation Email - Failed to send to: $user_email - Debug: " . $this->email->print_debugger(['headers']));
            return false;
        }
        return true;
    }

    public function send_forgot_password_email($user_email, $new_password, $user_name = 'User') {
        $this->_initialize_email_config();
    
        $from_email = $this->config->item('from_email_address') ?: "support@mimisvapp.com";
        $from_name  = $this->config->item('from_email_name') ?: "Mimisv App";
        $subject    = "Your New Password - " . $from_name;
    
        // Load email view with data
        $message_body = $this->load->view('Emails/forgot_password_email', [
            'user_name'     => $user_name,
            'new_password'  => $new_password,
            'from_name'     => $from_name
        ], true);
    
        $this->email->set_mailtype("html");
        $this->email->to($user_email);
        $this->email->from($from_email, $from_name);
        $this->email->subject($subject);
        $this->email->message($message_body);
    
        if (!$this->email->send()) {
            log_message('error', "Forgot Password Email - Failed to send to: $user_email - Debug: " . $this->email->print_debugger(['headers']));
            return false;
        }
    
        return true;
    }
}
