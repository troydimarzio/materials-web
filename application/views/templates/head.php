<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
  <link href ="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href ="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href ="<?php echo base_url('assets/css/datepicker3.css') ?>" rel="stylesheet">
  <link href ="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url('assets/img/logo.png') ?>">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <style>
      html, body {
        overflow-x: hidden;
      }
      .brand {
        color: #EA125E;
        font-size: 32px;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
      }
      .Aktif{
        color: #00ff7f;
      }
      .Tidak {
        color: #ff0000;
      }
  </style>
</head>

<body>