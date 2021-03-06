<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AgroTur</title>
    <link rel="icon" id="icon_AgroTur" href="/public_resources/images/fav_icon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
</head>

@include('layouts.Navbar')

<body>
    <br/>
    <h4 class="container teal-text text-darken-3">Editar serviço</h4>
    <br/>
    <form class="container" action="/SalvarServico" method="post" enctype="multipart/form-data">
        <input type="hidden" name = "host_id" value="{{Auth::user()->id}}"/>
        <input type = "hidden" name = "_token" value = "{{ csrf_token()}}"/>
        <input type="hidden" name="id" value="{{ $servico->id}}" />
        <div class="row"> <!-- Título, preço e descrição -->
            <font size="5" class="row">
                Descrição:
            </font>
            <div class="input-field col s12"> <!--título-->
                <label class="active" for="service_title">Título do anúncio:</label>
                <input name="service_title" id="service_title" type="text" class="validate" required  value="{{$servico->nomeServico}}"> {{ $errors->first('service_title')}}
            </div>
            <div class="input-field col s12 m6 l4 left"> <!-- Preço -->
                <label class="active" for="service_price">Preço da diária:</label>
                <input name="service_price" placeholder="Valor em reais. Exemplo: 60.00" id="service_price" type="text" class="validate" required value="{{$anuncio->preco}}"> {{ $errors->first('service_price')}}
            </div>
            <div class="col s12 center"> <!-- Descrição -->
                <div class="row">
                    <div class="input-field col s12">
                        <label for="service_description">Descrição do anúncio:</label>
                        <input name="service_description" id="service_description" type="text" class="validate" required value="{{$anuncio->descricao}}">  {{ $errors->first('service_description')}}
                    </div>
                </div>
            </div>
            <div class="input-field col s12">
              <select name="service_category" id="service_category" class="validate" required value= {{ old('service_category')}}>
                <option value="{{ $servico->categoria}}" selected>{{ $servico->categoria}}</option>
                <option value="Esporte">Esporte</option>
                <option value="Gastronomia">Gastronomia</option>
                <option value="Trilha">Trilha</option>
                <option value="Outros">Outros</option>
              </select>
              <label>Categoria</label>
            </div>
            {{ $errors->first('service_category')}}
        </div>

        <div class="row"> <!-- Endereço -->
            <font size="5" class="row">
                Endereço:
            </font>
            <div class="input-field col s12 m8 l9"> <!--cidade-->
                <input name="service_municipality" id="service_municipality" type="text" class="validate" required value="{{$endereco->cidade}}"> {{ $errors->first('service_municipality')}}
                <label class="active" for="service_municipality">Cidade:</label>
            </div>
            <div class="input-field col s12 m4 l3"> <!--estado-->
                <select name="service_state" id="service_state" class="validate" required value="{{$endereco->estado}}"> {{ $errors->first('service_state')}}
                    <option value="{{$endereco->estado}}" selected>{{strtoupper($endereco->estado)}}</option>
                    <option value="ac">Acre</option>
                    <option value="al">Alagoas</option>
                    <option value="ap">Amapá</option>
                    <option value="am">Amazonas</option>
                    <option value="ba">Bahia</option>
                    <option value="ce">Ceará</option>
                    <option value="df">Distrito Federal</option>
                    <option value="es">Espírito Santo</option>
                    <option value="go">Goiás</option>
                    <option value="ma">Maranhão</option>
                    <option value="mt">Mato Grosso</option>
                    <option value="ms">Mato Grosso do Sul</option>
                    <option value="mg">Minas Gerais</option>
                    <option value="pa">Pará</option>
                    <option value="pb">Paraíba</option>
                    <option value="pr">Paraná</option>
                    <option value="pe">Pernambuco</option>
                    <option value="pi">Piauí</option>
                    <option value="rj">Rio de Janeiro</option>
                    <option value="rn">Rio Grande do Norte</option>
                    <option value="rs">Rio Grande do Sul</option>
                    <option value="ro">Rondônia</option>
                    <option value="rr">Roraima</option>
                    <option value="sc">Santa Catarina</option>
                    <option value="sp">São Paulo</option>
                    <option value="se">Sergipe</option>
                    <option value="to">Tocantins</option>
                </select>
                <label>Estado</label>
            </div>
            <div class="input-field col s12 l9"> <!-- rua -->
                <label class="active" for="service_street">Rua:</label>
                <input name="service_street" id="service_street" type="text" class="validate" required value="{{$endereco->rua}}"> {{ $errors->first('service_street')}}
            </div>
            <div class="input-field col s12 l3"> <!-- número -->
                <label class="active" for="service_street_number">Número:</label>
                <input name="service_street_number" id="service_street_number" type="text" class="validate" required value="{{$endereco->numero}}"> {{ $errors->first('service_street_number')}}
            </div>
            <div class="input-field col s12"> <!-- bairro -->
                <label class="active" for="service_neighborhood">Bairro:</label>
                <input name="service_neighborhood" id="service_neighborhood" type="text" class="validate" required value="{{$endereco->bairro}}"> {{ $errors->first('service_neighborhood')}}
            </div>
            <div class="input-field col s12 m6"> <!-- CEP -->
                <label class="active" for="service_postal_code">CEP:</label>
                <input name="service_postal_code" id="service_postal_code" type="text" class="validate" required value="{{$endereco->cep}}"> {{ $errors->first('service_postal_code')}}
            </div>
            <div class="input-field col s12"> <!-- complemento -->
                <label class="active" for="service_address_complement">Complemento:</label>
                <input name="service_address_complement" id="service_address_complement" type="text" value="{{$endereco->complemento}}">
            </div>
        </div>

        <div class="row">
            <!-- Imagens e link do YouTube -->
            <font size="5" class="row">
                Mídia:
            </font>
            <br/>
            <div class="row"><!--imagens-->
                @for ($i = 1; $i <= 8; $i++) <!--de 01 a 08 -->
                <?php
                if ($i - 1 < sizeof($imagens)) {
                    $image = $imagens[$i - 1]->imagem;
                }
                else {
                    $image = "";
                }
                ?>
                <div class="col s6 m4 l3">
                    <div class="card">
                        @if ($image == "")
                        <div class="row center">
                            <div class="card-image">
                                <i class="material-icons large grey-text text-darken-2">insert_photo</i>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="file-field input-field">
                                <div class="btn-flat">
                                    <i class="material-icons">add</i>
                                    <input type="file" id="image0{{$i}}" name="image0{{$i}}" accept="image/*" value="{{$image}}">
                                </div>
                                <div class="file-path-wrapper container">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row center"></div>
                        <div class="row center">
                            <div class="file-field input-field">
                                <div class="btn-flat">
                                    <img class="centered-and-cropped" style="border-radius:0%" src="{{ asset($image) }}" width="128" height="128">
                                    <input type="file" id="image0{{$i}}" name="image0{{$i}}" accept="image/*">
                                </div>
                                <div class="file-path-wrapper container">
                                    <br><br><br><br>
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endfor

                <div class="input-field col s12"> <!-- YouTube video -->
                    <label class="active" for="service_video">Link para vídeo no YouTube:</label>
                    <input name="service_video" id="service_video" type="text" class="validate"
                    title='Insira um link válido para um video do YouTube' value="{{$anuncio->video}}"
                    pattern='^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$'>
                </div>
            </div>
        </div>

        <div class="row center"><!--usar disabled num if enquanto tudo não estiver preenchido-->
            <button class="btn-large waves-effect waves-light" type="submit" name="action">Salvar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

</body>


@include('layouts.Footer')

<body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script>
        $('.dropdown-trigger').dropdown({
            alignment: 'right',
            coverTrigger: false,
            constrainWidth: false,
        });

        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false
            });
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('.carousel').carousel({
                dist: -10,
                indicators:true,
            }
            );
        });
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, {
            toolbarEnabled: true
            });
        });
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>
