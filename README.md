<h2><a id="user-content-установка" class="anchor" aria-hidden="true" href="#установка"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Установка</h2>
<ol>
<li>клонируем проект с github</li>
</ol>
<pre><code>git clone https://github.com/davydy4/yii-apple.git
</code></pre>
<ol start="2">
<li>
<p>Создаем БД, прописываем свои логин, пароль, имя бд. (в файле /path/to/yii-application/common/config/main-local.php или в /path/to/yii-application/common/config/main.php).</p>
</li>
<li>
<p>Переходим в корень проекта и устанавливаем composer</p>
</li>
</ol>
<pre><code>composer install
</code></pre>
<ol start="4">
<li>Выполняем миграции:</li>
</ol>
<pre><code>yii migrate
</code></pre>

<p>Переходим в бекэнд (например <a href="http://yii-apple/admin/site/login" rel="nofollow">http://yii-apple/admin/site/login</a>) и авторизуемся.</p>
<p>Логин: admin</p>
<p>Пароль: 123456</p>
<p>Далее в браузере переходим на страницу (например <a href="http://yii-apple/admin/apples/index" rel="nofollow">http://yii-apple/admin/apples/index</a>)</p>
<p>Нажимаем кнопку "Создать яблоки".</p>
</article>

