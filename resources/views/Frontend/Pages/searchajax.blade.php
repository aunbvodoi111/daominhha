<div class="search-info">
						<table class="table-search">
                        @foreach ($data as $items)				
							<tr>
								<td><a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}" target="_blank"><img src="{{$items->AnhChinh}}" width="120px" height="70px"></a></td>
								<td><a class="title-game-search" href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}" target="_blank">{{$items->Name}}</a></td>
                            </tr>
                        @endforeach
						</table>
					</div>