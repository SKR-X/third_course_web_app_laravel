<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        return view("dashboard", ['userId' => auth()->id()]);
    }

    public function tasks()
    {
        $client = new Client();
        $url = 'http://localhost:8080/tasks/user/'.auth()->id(); 

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]);

            $json = $response->getBody()->getContents();
            $tasks = json_decode($json, true);
            $tasks = array_reverse($tasks);

            // Проверка на ошибки декодирования JSON
            if ($tasks === null && json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Ошибка декодирования JSON: ' . json_last_error_msg()], 500);
            }

            // Возвращение данных во view
            return view('tasks', compact('tasks'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка запроса: ' . $e->getMessage()], 500);
        }
    }

    public function getTask($id)
    {
        // Здесь вы можете использовать $id для получения данных
        // Например, получить задачу по ID из базы данных
        $client = new Client();
        $url = 'http://localhost:8080/tasks/'.$id; // Замените на ваш URL

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]);

            $json = $response->getBody()->getContents();
            $task = json_decode($json, true);

            // Проверка на ошибки декодирования JSON
            if ($task === null && json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Ошибка декодирования JSON: ' . json_last_error_msg()], 500);
            }

            // Возвращение данных во view
            return view('getTask', compact('task'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка запроса: ' . $e->getMessage()], 500);
        }
    }

    public function createGroup() {
        return view('createGroup',['userId' => auth()->id()]);
    }

    public function createDay() {
        return view('createDay',['userId' => auth()->id()]);
    }
}
