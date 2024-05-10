<?php
$para        = 'lautaronicolasriofrio@gmail.com';
$titulo      = 'MAIL POR PHP';
$mensaje     = 'Mensaje de prueba';
$return_path = 'webmaster@example.com';

$cabeceras   = 'From: webmaster@example.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion() . "\r\n" .
               'Return-Path: ' . $return_path;

mail($para, $titulo, $mensaje, $cabeceras);
?>