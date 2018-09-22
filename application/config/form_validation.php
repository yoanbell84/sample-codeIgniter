<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = array(
        'users/register' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|callback_check_username_exists'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'passconf',
                        'label' => 'Password Confirmation',
                        'rules' => 'required|matches[password]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|callback_check_email_exists'
                )
        ),
        'clients/create' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|alpha'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|is_unique[clients.email]'
                ),               
                array(
                        'field' => 'dob',
                        'label' => 'Date of Birth',
                        'rules' => 'callback_checkDateFormat'
                )
        )
);
