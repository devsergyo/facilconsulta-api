<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CidadeRepositoryInterface;
use App\Repositories\Eloquent\CidadeRepository;
use App\Repositories\Interfaces\MedicoRepositoryInterface;
use App\Repositories\Eloquent\MedicoRepository;
use App\Repositories\Interfaces\PacienteRepositoryInterface;
use App\Repositories\Eloquent\PacienteRepository;
use App\Repositories\Interfaces\ConsultaRepositoryInterface;
use App\Repositories\Eloquent\ConsultaRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CidadeRepositoryInterface::class, CidadeRepository::class);
        $this->app->bind(MedicoRepositoryInterface::class, MedicoRepository::class);
        $this->app->bind(PacienteRepositoryInterface::class, PacienteRepository::class);
        $this->app->bind(ConsultaRepositoryInterface::class, ConsultaRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
