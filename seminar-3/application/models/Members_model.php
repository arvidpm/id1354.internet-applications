<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 17:11
 *
 *  This model makes all the needed SQL queries to the database id1354-mvc.
 *  Data is fetched for the <code>Members.php</code> controller.
 */
class Members_model extends CI_Model
{

    /**
     *  Fetches a matching user from the database and verifies its password
     *  The function calls verifyPassword which returns true if correct
     *
     * @param $username the username from Members controller
     * @param $password the password from Members controller
     * @return the array $result containing the information from the table, else: False
     */
    public function get_members($username, $password)
    {

        $query = $this->db->get_where('members', array('username' => $username), 1);
        // Produces: SELECT * FROM members WHERE 'username' = $username LIMIT 1

        $result = $query->result();
        return $this->verifyPassword($result, $password);

    }

    /**
     *  Inserts a new member to the database.
     *  The function calls hashPassword which returns a hashed password.
     *
     * @param $username the username from Members controller
     * @param $password the password from Members controller
     * @return $query result
     */
    public function set_members($username, $password)
    {

        $dbPassword = $this->hashPassword($password);

        $data = array(
            'username' => $username,
            'password' => $dbPassword
        );

        return $query = $this->db->insert('members', $data);
        // Produces: INSERT INTO members (username, password) VALUES ('My Username', 'My Hashed Password')

    }

    /**
     *  Hashes a given password by using PHP build in function password_hash
     *
     * @param $password the password to hash
     * @return $hashed_password the hashed password
     */
    private function hashPassword($password)
    {
        return $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     *  Checks user password against hashed user password stored in database
     *
     * @param $result a pointer to the result array.
     * @param $password the hashed password to verify
     * @return $result array with table information if true, else: FALSE
     */
    private function verifyPassword($result, $password)
    {

        foreach ($result as $row) {

            $hash = $row->password;
            $verified = password_verify($password, $hash);

            if (empty($verified))
                return FALSE;
            else
                return $result;
        }
        return FALSE;
    }
}