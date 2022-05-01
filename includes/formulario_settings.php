<?php

add_action('admin_menu', 'adicionar_pessoa');
function adicionar_pessoa(){
    add_menu_page(
        'Adicionar pessoa',
        'Adicionar pessoa',
        'manage_options',
        'contact-management',
        'adicionar_pessoa_pagina',
        'dashicons-businessperson',
        -1
    );
}

function adicionar_pessoa_pagina()
{
    ?>
    <div>
        <h1>Adicionar pessoa</h1>
        <form method="post" action="options.php"> 
        <?php 
            settings_errors();
            do_settings_sections('contact-management');
            settings_fields('formulario_settings');
            submit_button();
        ?>
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'adicionar_pessoa_pagina_secao');

function adicionar_pessoa_pagina_secao() 
{
    //Seção
    add_settings_section(
        'adicionar_pessoa_pagina_secao',
        __('Configurações para adicionar pessoa','adicionar_pessoa_pagina'),
        'adicionar_pessoa_pagina_secao_detalhes',
        'contact-management'
    );

    //Nome
    add_settings_field(
        'adicionar_pessoa_pagina_secao_nome',
        __('Nome completo', 'adicionar_pessoa_pagina'),
        'adicionar_pessoa_pagina_secao_nome',
        'contact-management',
        'adicionar_pessoa_pagina_secao'
    );

    register_setting(
        'formulario_settings',
        'adicionar_pessoa_pagina_secao_nome',
    );

    //ID
    add_settings_field(
        'adicionar_pessoa_pagina_secao_ID',
        __('ID', 'adicionar_pessoa_pagina'),
        'adicionar_pessoa_pagina_secao_ID',
        'contact-management',
        'adicionar_pessoa_pagina_secao'
    );

    register_setting(
        'formulario_settings',
        'adicionar_pessoa_pagina_secao_ID',
    );

    //Endereço de email
    add_settings_field(
        'adicionar_pessoa_pagina_secao_email',
        __('Email','adicionar_pessoa_pagina'),
        'adicionar_pessoa_pagina_secao_email',
        'contact-management',
        'adicionar_pessoa_pagina_secao'
    );

    register_setting(
        'formulario_settings',
        'adicionar_pessoa_pagina_secao_email',
    );
}

//Função callback seção
function adicionar_pessoa_pagina_secao_detalhes(){
    ?>
    <p><?__('Insira os dados de nome, ID e endereço de e-mail')?></p>
    <?php
}

//Função callback nome
function adicionar_pessoa_pagina_secao_nome()
{
    ?>
    <input type="text" id="adicionar_pessoa_pagina_secao_nome'
        name="adicionar_pessoa_pagina_secao_nome" value="<?= esc_attr(get_option('adicionar_pessoa_pagina_secao_nome')) ?>" required>
    <?php
}

//Função callback ID
function adicionar_pessoa_pagina_secao_ID()
{
    ?>
    <input type="text" minlength="6" id="adicionar_pessoa_pagina_secao_ID'
        name="adicionar_pessoa_pagina_secao_ID" value="<?= esc_attr(get_option('adicionar_pessoa_pagina_secao_ID')) ?>" required>
    <?php

}

//Função callback email
function adicionar_pessoa_pagina_secao_email()
{
    ?>
    <input type="email" id="adicionar_pessoa_pagina_secao_email'
        name="adicionar_pessoa_pagina_secao_email" value="<?= esc_attr(get_option('adicionar_pessoa_pagina_secao_email')) ?>" required>
    <?php

}
