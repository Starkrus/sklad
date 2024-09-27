<?php

namespace App\Orchid\Screens;

use App\Models\Act;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
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
     * Загрузка данных для экрана.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'acts' => Act::all(), // Здесь загружаются все данные из таблицы acts
        ];
    }

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
     * Определение отображаемых данных на экране.
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            Layout::table('acts', [
                TD::make('id', 'ID')->sort(),
                TD::make('sent', 'Отправитель')->sort(),
                TD::make('date', 'Дата'),
                TD::make('comments', 'Комментарии'),
                TD::make('received', 'Получатель'),
                TD::make('file_path', 'Файл'),
            ]),
        ];
    }
}
