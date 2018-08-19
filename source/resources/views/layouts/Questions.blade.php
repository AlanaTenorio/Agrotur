<div class="row">
    <div class="col m1"></div>
    <div class="col s12 m10">
        <h5 class="green-text text-darken-3" >Perguntas</h5>
    </div>
    <div class="col m1"></div>
</div>

@if(Auth::guard()->check())
    <div class="row">
        <div class="col m1"></div>
        <div class="col s12 m10">
            <div>
                <form action="/ask-question" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="client_id" value="{{Auth::user()->id}}"/>
                    <input type="hidden" name="ad_id" value="{{$anuncio->id}}"/>
                    <div class="row">
                        <div class="input-field col s12 m9 l10">
                            <label for="question">Escreva uma pergunta...</label>
                            <textarea id="question" class="materialize-textarea" name="question"></textarea>
                        </div>
                        <div class="col s12 m3 l2 center">
                            <button class="btn-flat btn-large teal darken-3 white-text waves-effect waves-light center" type="submit" name="ask" value="ask">
                                Perguntar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col m1"></div>
    </div>
@else
    <div class="row">
        <div class="col m1"></div>
        <div class="col s12 m10">
            <strong>É preciso estar logado para fazer perguntas.</strong>
        </div>
        <div class="col m1"></div>
    </div>
@endif

<div class="row">
    <div class="col m1"></div>
    <div class="col s12 m10">
        <strong>Últimas perguntas</strong>
        <ul>
            @if (sizeof($questions) == 0)
                <li>Ainda não há perguntas para este anúncio.</li>
            @else
                @foreach ($questions as $question)
                    <div class="row card-panel">
                        <div class="col s12">
                            <i class="material-icons tiny">message</i>
                            {{ $question->question }}
                        </div>
                        <div class="col s12">
                            @if($question->answer == NULL && Auth::guard()->check() && Auth::user()->id == $anuncio->anunciante_id)
                                <form action="/answer-question" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="question_id" value="{{$question->id}}"/>
                                    <div class="row valign-wrapper">
                                        <div class="input-field col s12 m9 l10">
                                            <label for="response">Responder pergunta...</label>
                                            <textarea id="response" class="materialize-textarea" name="response"></textarea>
                                        </div>
                                        <div class="col s12 m3 l2">
                                            <button class="btn-flat teal darken-3 white-text waves-effect waves-light center" type="submit" name="answer" value="answer">
                                                Responder
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @elseif($question->answer != NULL)
                                <div class="col s12">
                                    <span class="grey-text text-darken-2">
                                        &nbsp;&nbsp;&nbsp; <i class="material-icons tiny">question_answer</i>
                                        {{ $question->answer }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col m1"></div>
</div>
