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


    public function get_members($username, $password)
    {

        $this->db->select('id, username, password');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            $result = $query->result();
            return $this->verifyPassword($result, $password);

        } else {

            return FALSE;
        }

    }


    public function set_members($username, $password)
    {

        $dbPassword = $this->hashPassword($password);

        $data = array(
            'username' => $username,
            'password' => $dbPassword
        );

        $query = $this->db->insert('members', $data);
        // Produces: INSERT INTO mytable (username, password) VALUES ('My Username', 'My Hashed Password')

        if ($query) {
            return TRUE;

        } else {

            return FALSE;
        }

    }


    private function hashPassword($password)
    {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        return $hashed_password;

    }


    private function verifyPassword(&$result, $password)
    {

        foreach ($result as $row) {

            $hash = $row->password;
            $verified = password_verify($password, $hash);

            if (empty($verified))
                return FALSE;
            else
                return $result;
        }
    }

}