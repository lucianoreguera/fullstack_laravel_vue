<?php

namespace App\ViewModels\Backoffice;

use App\Models\Base\Category;
use App\Models\Base\Course;
use App\Models\Base\Lesson;
use App\Models\Base\User;
use App\Services\Frontend\StatsGenerator;
use App\Services\Frontend\UIElements\StatItems\StatDefault;
use App\Traits\ViewModels\WithUser;
use App\ViewModels\ViewModel;

class GetDashboardViewModel extends ViewModel
{
    use WithUser;

    public function __construct(
        protected readonly StatsGenerator $statsGenerator   ,
    ) {}

    public function stats(): array
    {
        return $this->statsGenerator
            ->addStat(
                new StatDefault(
                    label: 'Total Usuarios',
                    value: User::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total Cursos',
                    value: Course::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total Categorías',
                    value: Category::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total Lecciones',
                    value: Lesson::count(),
                )
            )
            ->getStats();
    }
}