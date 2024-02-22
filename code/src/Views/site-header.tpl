<header>
    <p>
        {% set now = date('now', 'Europe/Moscow') %}
        Текущее время: {{ now.format('H:i:s') }}
    </p>

    <nav>
        <a href="/">Главная</a>
        <a href="/users">Пользователи</a>
        <a href="/about">О нас</a>
        <a href="/user/save">Добавить пользователя</a>

    </nav>
</header>