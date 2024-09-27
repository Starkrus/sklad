<?php

namespace App\Orchid\Screens;

use App\Models\Act;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class ActCreateScreen extends Screen
{
    // Название экрана, которое будет отображаться в заголовке
    public $name = 'Создать новый акт';

    // Описание экрана (необязательно)
    public $description = 'Форма для создания нового акта';

    // Данные для экрана (если нужно передать данные в шаблон)
    public function query(): array
    {
        return [];
    }

    // Командная панель с действиями (например, кнопки)
    public function commandBar(): array
    {
        return [
            // Кнопка "Сохранить", которая вызывает метод 'save'
            Button::make('Сохранить')
                ->icon('check')
                ->method('save'),
        ];
    }

    // Определение полей формы
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('sent')
                    ->title('Получатель')
                    ->required(),

                Input::make('date')
                    ->type('date')
                    ->title('Дата отгрузки')
                    ->required(),

                Input::make('received')
                    ->title('Менеджер')
                    ->required(),

                Input::make('comments')
                    ->title('Комментарий')
                    ->required(),

                Input::make('received')
                    ->title('Наименование товара')
                    ->required(),

                Input::make('received')
                    ->title('Количество')
                    ->required(),
            ]),
        ];
    }

    // Метод для сохранения данных
    public function save(Request $request): void
    {
        // Валидация данных формы
        $validatedData = $request->validate([
            'sent' => 'required|string|max:255',
            'date' => 'required|date',
            'comments' => 'nullable|string',
            'received' => 'required|string|max:255',
            'file_path' => 'nullable|string|max:255',
        ]);

        // Сохранение данных в базу
        Act::create($validatedData);

        // Уведомление об успешном создании
        Toast::info('Акт успешно создан!');

        // Редирект на страницу со списком актов
        redirect()->route('platform.acts');
    }
}
