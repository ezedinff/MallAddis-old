
    <div class="card" >
        <div class="collection">
            <?php $cat  = \App\Service_provider::selectRaw('category_id ')->groupBy('category_id')->where('mall_id',$mall->id)->get(); ?>
            <p class="center header">Categories</p>
                @foreach($cat as $c)
                    <?php $category = \App\Category::where('id',$c->category_id)->get();

                    ?>
                        @if($category->count() > 0)
                            <a href='{{url("/show/{$mall->id}/retailersByCategory/{$category[0]->id}")}}' class="collection-item blue-text lighten-1">{{$category[0]->name}}</a>
                        @endif
                @endforeach
        </div>
    </div>