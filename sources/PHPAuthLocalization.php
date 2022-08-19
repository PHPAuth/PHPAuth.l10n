<?php

namespace PHPAuth;

use PDO;

// PHPAuthLocalization

class PHPAuthLocalization
{
    public const DEFAULT_SQL_TABLE = 'phpauth_translation_dictionary';

    private $current_language = '';

    public function __construct(string $language = 'en_GB')
    {
        $this->current_language = $language;
    }

    public function use():array
    {
        $lang_file = __DIR__ . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . "{$this->current_language}.php";

        if (is_readable($lang_file)) {
            $dictionary = include $lang_file;
        } else {
            $dictionary = $this->setForgottenDictionary();
        }

        return $dictionary;
    }

    /**
     * Load localization data from Database table phpauth_translation_dictionary
     *
     * @param string $sql_table
     * @param PDO $pdo
     * @return array|false
     */
    public function useDB(PDO $pdo, string $sql_table = self::DEFAULT_SQL_TABLE)
    {
        return $pdo
            ->query("SELECT `translation_key`, `{$this->current_language}` as `lang` FROM {$sql_table} ")
            ->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    /**
     * Returns forgotten translation dictionary
     *
     * @return array
     */
    protected function setForgottenDictionary(): array
    {
        $lang = array();

        $lang['user_blocked'] = 'You are currently locked out of the system.';
        $lang['user_verify_failed'] = 'Captcha Code was invalid.';

        $lang['account_email_invalid'] = 'Email address is incorrect or banned';
        $lang['account_password_invalid'] = 'Password is invalid';
        $lang['account_not_found'] = 'No account found with that email address';

        $lang['login_remember_me_invalid'] = 'The remember me field is invalid.';

        $lang['email_password_invalid'] = 'Email address / password are invalid.';
        $lang['email_password_incorrect'] = 'Email address / password are incorrect.';
        $lang['remember_me_invalid'] = 'The remember me field is invalid.';

        $lang['password_short'] = 'Password is too short.';
        $lang['password_weak'] = 'Password is too weak.';
        $lang['password_nomatch'] = 'Passwords do not match.';
        $lang['password_changed'] = 'Password changed successfully.';
        $lang['password_incorrect'] = 'Current password is incorrect.';
        $lang['password_notvalid'] = 'Password is invalid.';

        $lang['newpassword_short'] = 'New password is too short.';
        $lang['newpassword_long'] = 'New password is too long.';
        $lang['newpassword_invalid'] = 'New password must contain at least one uppercase and lowercase character, and at least one digit.';
        $lang['newpassword_nomatch'] = 'New passwords do not match.';
        $lang['newpassword_match'] = 'New password is the same as the old password.';

        $lang['email_short'] = 'Email address is too short.';
        $lang['email_long'] = 'Email address is too long.';
        $lang['email_invalid'] = 'Email address is invalid.';
        $lang['email_incorrect'] = 'Email address is incorrect.';
        $lang['email_banned'] = 'This email address is not allowed.';
        $lang['email_changed'] = 'Email address changed successfully.';

        $lang['newemail_match'] = 'New email matches previous email.';

        $lang['account_inactive'] = 'Account has not yet been activated.';
        $lang['account_activated'] = 'Account activated.';

        $lang['logged_in'] = 'You are now logged in.';
        $lang['logged_out'] = 'You are now logged out.';

        $lang['system_error'] = 'A system error has been encountered. Please try again.';

        $lang['register_success'] = 'Account created. Activation email sent to email.';
        $lang['register_success_emailmessage_suppressed'] = 'Account created.';
        $lang['email_taken'] = 'The email address is already in use.';

        $lang['resetkey_invalid'] = 'Reset key is invalid.';
        $lang['resetkey_incorrect'] = 'Reset key is incorrect.';
        $lang['resetkey_expired'] = 'Reset key has expired.';
        $lang['password_reset'] = 'Password reset successfully.';

        $lang['activationkey_invalid'] = 'Activation key is invalid.';
        $lang['activationkey_incorrect'] = 'Activation key is incorrect.';
        $lang['activationkey_expired'] = 'Activation key has expired.';

        $lang['reset_requested'] = 'Password reset request sent to email address.';
        $lang['reset_requested_emailmessage_suppressed'] = 'Password reset request is created.';
        $lang['reset_exists'] = 'A reset request already exists. Next reset password request will available at %s';

        $lang['already_activated'] = 'Account is already activated.';
        $lang['activation_sent'] = 'Activation email has been sent.';
        $lang['activation_exists'] = 'An activation email has already been sent. Next reactivation will available at %s';

        $lang['email_activation_subject'] = '%s - Activate account';
        $lang['email_activation_body'] = 'Hello,<br/><br/> To be able to log in to your account you first need to activate your account by clicking on the following link : <strong><a href="%1$s/%2$s">%1$s/%2$s</a></strong><br/><br/> You then need to use the following activation key: <strong>%3$s</strong><br/><br/> If you did not sign up on %1$s recently then this message was sent in error, please ignore it.';
        $lang['email_activation_altbody'] = 'Hello, ' . "\n\n" . 'To be able to log in to your account you first need to activate your account by visiting the following link :' . "\n" . '%1$s/%2$s' . "\n\n" . 'You then need to use the following activation key: %3$s' . "\n\n" . 'If you did not sign up on %1$s recently then this message was sent in error, please ignore it.';

        $lang['email_reset_subject'] = '%s - Password reset request';
        $lang['email_reset_body'] = 'Hello,<br/><br/>To reset your password click the following link :<br/><br/><strong><a href="%1$s/%2$s">%1$s/%2$s</a></strong><br/><br/>You then need to use the following password reset key: <strong>%3$s</strong><br/><br/>If you did not request a password reset key on %1$s recently then this message was sent in error, please ignore it.';
        $lang['email_reset_altbody'] = 'Hello, ' . "\n\n" . 'To reset your password please visiting the following link :' . "\n" . '%1$s/%2$s' . "\n\n" . 'You then need to use the following password reset key: %3$s' . "\n\n" . 'If you did not request a password reset key on %1$s recently then this message was sent in error, please ignore it.';

        $lang['account_deleted'] = 'Account deleted successfully.';
        $lang['function_disabled'] = 'This function has been disabled.';

        $lang['php_version_required'] = 'PHPAuth engine requires PHP version %s+!';

        return $lang;
    } // setForgottenDictionary()

}