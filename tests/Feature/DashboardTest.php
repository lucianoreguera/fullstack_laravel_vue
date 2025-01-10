<?php

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('a guest cannot access to the dashboard', function () {
    $response = $this->get(route('backoffice.dashboard.index'));

    $this->assertGuest();
    $response->assertRedirect(route('login'));
});

test('a admin can access to the dashboard', function () {
    $response = asAdmin()->get(route('backoffice.dashboard.index'));

    $this->assertAuthenticated();
    $response->assertOk();
    $response->assertViewIs('backoffice.dashboard');
    $response->assertViewHas('json_url');
});

test('dashboard json contain expected structure', function () {
    $response = asAdmin()->get(route('backoffice.dashboard.json'));

    // La estructura que definimos en el view model
    $response->assertJsonStructure([
        'user' => [
            'user_id',
            'name',
            'email',
        ],
        'skeleton',
        'stats' => [
            '*' => [
                'id',
                'component',
                'props' => [
                    'label',
                    'value',
                ],
            ],
        ],

    ]);
});
