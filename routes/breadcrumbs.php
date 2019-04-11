<?php

// Inicio
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Principal', route('home'));
});

// Usuarios
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('users.index'));
});
Breadcrumbs::for('userscreate', function ($trail) {
    $trail->parent('users');
    $trail->push('Nuevo', route('users.create'));
});
Breadcrumbs::for('usersedit', function ($trail) {
    $trail->parent('users');
    $trail->push('Edicion', route('users.index'));
});
// Perfil
Breadcrumbs::for('perfil', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('users.perfil'));
});

// Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::for('rolescreate', function ($trail) {
    $trail->parent('roles');
    $trail->push('Nuevo', route('roles.create'));
});
Breadcrumbs::for('rolesedit', function ($trail) {
    $trail->parent('roles');
    $trail->push('Edicion', route('roles.index'));
});

// Empresa
Breadcrumbs::for('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Empresa', route('empresas.index'));
});


// Usuarios
Breadcrumbs::for('persona', function ($trail) {
    $trail->parent('home');
    $trail->push('Persona', route('persona.index'));
});
Breadcrumbs::for('personacreate', function ($trail) {
    $trail->parent('persona');
    $trail->push('Nuevo', route('persona.create'));
});
Breadcrumbs::for('personaedit', function ($trail) {
    $trail->parent('persona');
    $trail->push('Edicion', route('persona.index'));
});

Breadcrumbs::for('personashow', function ($trail) {
    $trail->parent('persona');
    $trail->push('Mostrar', route('persona.index'));
});


Breadcrumbs::for('personaimportar', function ($trail) {
    $trail->parent('persona');
    $trail->push('Importar', route('persona.index'));
});