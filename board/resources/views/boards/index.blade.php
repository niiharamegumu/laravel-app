<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1>ひとこと掲示板</h1>
    @if ( $errors->any() )
      <div class="error-alert">
        <ul>
          @foreach ( $errors->all() as $error )
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form method="post" action="{{ route('board.add') }}">
      @csrf
      <label for="name">名前：</label>
      <input type="text" name="name" id="name"><br>
      <label for="comment">コメント：</label>
      <input type="text" name="comment" id="comment" class="comment"><br>
      <input type="submit" name="submit" value="書き込み">
    </form>
    @if ( isset($boards) )
    <main>
      <ul class="comment-list">
        @foreach ( $boards as $board )
        <li>{{ $board->name }} : {{ $board->comment }} -- {{ $board->created_at }}</li>
        @endforeach
      </ul>
    </main>
    @endif
  </body>
</html>
