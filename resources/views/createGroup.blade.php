<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создайте задачу') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div>
            <label for="name">Название группы:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="GroupPriority">Приоритет группы:</label><br>
            <input type="number" id="GroupPriority" name="GroupPriority" required><br><br>

            <label>Описание группы:</label><br>
            <textarea id="description"></textarea><br>

            <input type="button" id="submitButton" value="Создать задачу">
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('submitButton').addEventListener('click', function () {
        var name = document.getElementById('name').value;
        var description = document.getElementById('description').value;
        var GroupPriority = parseInt(document.getElementById('GroupPriority').value,10);

        fetch('http://localhost:8080/groups/', {
            method: 'POST',
            mode: 'no-cors',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                "userId": {{ $userId }},
                "name": name,
                "description": description,
                "groupPriority": GroupPriority
            }),
            credentials: 'include'
        });
        alert('Группа ' + name + ' создана!')
    });

</script>