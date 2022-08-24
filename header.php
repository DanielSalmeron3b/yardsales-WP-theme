<!DOCTYPE html>
<!-- WP automáticamente puede seleccionar el idioma -->
<html <?php language_attributes(); ?>>

<head>
    <!-- Selecciona el charset como esté seleccionado automaticamente en WP -->
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <title>Yard Sales</title> -->
    <!-- Head hook -->
    <?php wp_head(); ?>
</head>

<body>
    <!-- Agrega un hook por si debemos insertar código al inicio del body -->
    <?php wp_body_open(); ?>
    <!-- Calling content-header.php -->
    <?php get_template_part('template-parts/content','header'); ?>

    <main class="productos">
        <div class="container-fluid gx-5">