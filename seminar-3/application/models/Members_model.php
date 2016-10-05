<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 17:11
 *
 *  This model makes all the needed SQL queries to the database:
 *  recipe_mvc and the table: users and returns desired
 *  data to the controller Members.php
 */
class Members_model extends CI_Model
{

    // Fetches a matching user from the database and then check its password
    public function get_members($username, $password)
    {

        $query = $this->db->get_where('members', array('username' => $username), 1);
        // Produces: SELECT * FROM members WHERE 'username' = $username LIMIT 1

        $result = $query->result();
        return $this->verifyPassword($result, $password);

    }

    // Inserts a new user to database
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

    // Hashes user password
    private function hashPassword($password)
    {
        return $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Checks user password against hashed user password
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