<html>
<body>
	<h1>Hola {{ $name }}</h1>
  <p>Mi edad es {{ $age }}</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, adipisci esse labore, vel nisi unde culpa, amet saepe accusantium corrupti natus. Ipsam facere ducimus consequatur odit quaerat nemo perferendis beatae?</p>

  @if ($age < 2)
    Es un bebé.
  @elseif (($age >= 2) && ($age < 12))
    Es un niño.
  @elseif (($age >= 12) && ($age < 18))
    Es un adolescente.
  @else
    Es un adulto.
  @endif

  @auth
    <p>The user is authenticated...</p>
  @endauth
   
  @guest
    <p>The user is not authenticated...</p>
  @endguest

  @for ($i = 0; $i < 10; $i++)
    <p>The current value is {{ $i }}</p>
  @endfor
</body>
</html>