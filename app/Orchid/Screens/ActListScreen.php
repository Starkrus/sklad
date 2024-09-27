<?php

namespace App\Orchid\Screens;

use App\Models\Act;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ActListScreen extends Screen
{
    /**
     * Название экрана.
     *
     * @var string
     */
    public $name = 'Список актов';

    /**
     * Действия, доступные на экране.
     *
     * @return array
     */
    public function commandBar(): array
    {
        return [
            Link::make('Создать акт')
                ->icon('plus')
                ->route('platform.acts.create'),
        ];
    }

    /**
     * Загрузка данных для экрана, включая поддержку сортировки и пагинации.
     *
     * @return array
     */
    public function query(): array
    {
        // Используем сортировку и пагинацию без лишних фильтров
        $acts = Act::query()
            ->orderBy('id', 'desc') // Сортировка по полю id
            ->paginate(10); // Пагинация

        return [
            'acts' => $acts,
        ];
    }

    /**
     * Определение отображаемых данных на экране.
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            Layout::table('acts', [
                TD::make('id', 'ID')->sort(), // Сортировка по ID
                TD::make('sent', 'Куда отгрузили')->sort(),
                TD::make('date', 'Дата')->sort(),
                TD::make('received', 'Менеджер')->sort(),
                TD::make('comments', 'Комментарии'),
                TD::make('file_path', 'Файл')->render(function (Act $act) {
                        return $act->file_path ? "<a href='".url($act->file_path)."' class='btn btn-primary' target='_blank'>Открыть файл</a>"
                            : 'Нет файла';
                    }),
            ]),
        ];
    }
}
