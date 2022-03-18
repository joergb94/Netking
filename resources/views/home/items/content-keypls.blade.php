
							<div class="col-12 keypls-home" id="index_table">
                                <div class="row">
                                    @forelse($data['keypls'] as $Card)
                                        <div class="col-6 col-sm-4">
                                            <a  href="/Keypls/{{$Card['id']}}" target="_blank" rel="noopener noreferrer">
                                            <div class=" div-rounded"  id="Card{{$Card->id}}">
                                                <div class="card-body text-center container-btn keypls-card">
                                                
                                                @if($Card->card_styles[0]->background_color)
                                                        <div class="keypl-background mx-auto d-block div-rounded"  style="background-color:{{$Card['background_image_color']}}; color:{{$Card->color}};">
                                                    @else
                                                        <div class="keypl-background mx-auto d-block div-rounded"  style="background-image: url('{{$Card->img_path}}{{$Card->img_name}}'); color:{{$Card->color}}; background-size:cover; background-repeat:no-repeat;" >
                                                    @endif

                                                        <img class="keypl-img rounded-circle" src="{{(isset($Card->img))? $Card->img:asset('img/profile.jpg')}}" alt="{{ $Card->title }}">
                                                    </div> 

                                                    <div class="mx-auto d-block keypl-title">
                                                        <h4>{{ $Card->title }}</h4>
                                                    </div>
                                                    
                                                </div> 
                                            </div>
                                            </a>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <!--pagination section-->
                                    <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-7">
                                        <div class="float-left">
                                            {!! $data['keypls']->total() !!} {{ trans_choice('Keypl|Keypls', $data['keypls']->total()) }}
                                        </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-5">
                                        <div class="float-right">
                                            <br>
                                            {!! $data['keypls']->render() !!}
                                            <br>
                                        </div>
                                        </div>
                                        <!--col-->
                                    </div>
                                    <!--row-->
                                    </div>
							</div>