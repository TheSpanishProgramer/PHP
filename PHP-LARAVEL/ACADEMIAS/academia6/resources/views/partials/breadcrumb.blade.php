<nav aria-label="breadcrumb" class="margen-arriba">
    <ol class="breadcrumb">

        @if(Request::is('category'))

            <li class="breadcrumb-item active" aria-current="page">Cursos</li>

        @elseif(isset($subject))

            <li class="breadcrumb-item"><a href="{{ route('category') }}">Cursos</a></li>

            @if(!isset($subject->category->category))

                <li class="breadcrumb-item"><a href="{{ route('category.show', $subject->category) }}">{{ $subject->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subject->name }}</li>

            @elseif(isset($subject->category->category))

                <li class="breadcrumb-item"><a href="{{ route('category.show', $subject->category->category) }}">{{ $subject->category->category->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.show', $subject->category) }}">{{ $subject->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subject->name }}</li>

            @endif

        @elseif(!isset($category->category))

            <li class="breadcrumb-item"><a href="{{ route('category') }}">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>

        @elseif(isset($category->category))

            <li class="breadcrumb-item"><a href="{{ route('category') }}">Cursos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.show', $category->category) }}">{{ $category->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>

        @endif

    </ol>
</nav>