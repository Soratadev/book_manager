<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <form method="POST" action="" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        @method('post')

                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="title" placeholder="Introduce el título del libro" name="title" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col mb-3">
                                <label for="author" class="form-label">Autor:</label>
                                <input type="text" class="form-control" id="author" placeholder="Introduce el autor del libro" name="author" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col mb-3">
                                <label for="genre" class="form-label">Género:</label>
                                <select class="form-select" aria-label="large select example" id="genre" name="genre">
                                    <option selected>Selecciona un género</option>
                                    <option value="1">realista</option>
                                    <option value="2">histórico</option>
                                    <option value="3">autobiografía</option>
                                    <option value="4">ciencia-ficción</option>
                                    <option value="5">distópico</option>
                                    <option value="6">utópico</option>
                                    <option value="7">fantasía</option>
                                    <option value="8">detectivesco</option>
                                    <option value="9">pulp</option>
                                    <option value="10">terror</option>
                                    <option value="11">misterio</option>
                                    <option value="12">aventura</option>
                                    <option value="13">romántico</option>
                                    <option value="14">satírico</option>
                                    <option value="15">otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="publisher" class="form-label">Editorial:</label>
                                <input type="text" class="form-control" id="publisher" placeholder="Introduce la editorial" name="publisher">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col mb-3">
                                <label for="isbn" class="form-label">ISBN:</label>
                                <input type="text" class="form-control" maxlength="13" pattern="[0-9]+" id="isbn" placeholder="Introduce el ISBN (13 dígitos)" name="isbn" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col mb-3">
                                <label for="publication_year" class="form-label">Año de publicación:</label>
                                <input type="text" class="form-control" maxlength="4" pattern="[0-9]+" id="publication_year" placeholder="Introduce el año de publicación" name="publication_year">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="cover" class="form-label">Portada:</label>
                                <input type="file" class="form-control" id="cover" placeholder="imagen de la portada" name="cover">
                            </div>
                            <div class="col mb-3">
                                <label for="pages" class="form-label">Número de páginas:</label>
                                <input type="text" class="form-control" maxlength="5" pattern="[0-9]+" id="pages" placeholder="Introduce el número de páginas" name="pages">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col mb-3 mt-4">
                                <label for="fin_si" class="form-label">¿Lo has terminado?: </label>
                                <input type="radio" class="radio" id="fin_si" name="finished" value="sí" required/>
                                <label for="fin_si" class="form-label"> Sí</label>
                                <input type="radio" class="radio" id="fin_no" name="finished" value="no" required/>
                                <label for="fin_no" class="form-label"> No</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="col form-check mb-3 mt-4">
                                    <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                                    <label class="form-check-label" for="myCheck">¿Estás de acuerdo con que vendamos tus datos, tu primogénito y a tu mascota?.</label>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                            <a href="#">{{ __('Cancelar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
