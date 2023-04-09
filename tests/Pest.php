<?php

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(Tests\TestCase::class, LazilyRefreshDatabase::class)
    ->beforeEach(fn() => $this->seed(DatabaseSeeder::class))
    ->in('Feature');
