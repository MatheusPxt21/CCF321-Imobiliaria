@extends('layouts.corretor')

@section('title', 'Adicionar Imóvel')

@section('content')
    <div class="container mt-5">
        <h2>Adicionar Novo Imóvel</h2>
        <form method="POST" action="{{ route('imoveis.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo"
                       placeholder="Insira o título do imóvel" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4"
                          placeholder="Insira a descrição do imóvel" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Imóvel</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Terreno">Terreno</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="categorias" class="form-label">Categorias</label>
                <input type="text" class="form-control" id="categorias" name="categorias"
                       placeholder="Insira as categorias, separadas por vírgula" required>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor do Imóvel</label>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="Insira o valor do imóvel"
                       required>
            </div>

            <div class="mb-3">
                <label for="corretor_id" class="form-label">Corretor Responsável</label>
                <select class="form-control" id="corretor_id" name="corretor_id" required>
                    <option value="" disabled selected>Selecione um corretor</option>
                    @foreach($corretores as $corretor)
                        <option value="{{ $corretor->id }}">{{ $corretor->id }} - {{ $corretor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Multiple Image Upload -->
            <div class="mb-3">
                <label for="imagens" class="form-label">Imagens do Imóvel</label>
                <input type="file" class="form-control" id="imagens" name="imagens[]" multiple accept="image/*">
            </div>

            <!-- Simplified Image Preview Grid -->
            <div id="imagePreview" class="row mt-3">
                <!-- Images will be dynamically added here -->
            </div>

            <button type="submit" class="btn btn-primary mt-4">Adicionar Imóvel</button>
        </form>
    </div>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('imagens').addEventListener('change', function (event) {
                let imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = ''; // Clear existing images

                let files = event.target.files;
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            let col = document.createElement('div');
                            col.classList.add('col-md-3', 'mb-3');

                            let img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('img-fluid', 'img-thumbnail');
                            img.alt = `Imagem ${i + 1}`; // Alt text for accessibility

                            col.appendChild(img);
                            imagePreview.appendChild(col);
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }
            });
        });
    </script>
@endsection
