@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать продукт</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Главная</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <form action="{{ route('product.update', $product->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="title" value="{{ $product->title ?? old('title') }}" class="form-control" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" value="{{ $product->description ?? old('description') }}" class="form-control" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ $product->content ?? old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value="{{ $product->price ?? old('price') }}" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" value="{{ $product->count ?? old('count') }}" class="form-control" placeholder="Количество на складе">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile">{{ $product->preview_image ?? old('preview_image') }}</label>
                                <input name="preview_image" type="file" value="{{ old('preview_image', $product->preview_image) }}" class="custom-file-input" id="exampleInputFile">
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                              <option selected="selected" disabled>Выберите категорию</option>
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($category->id == $product->category_id) ? 'selected' : '' }} 
                                >
                                    {{ $category->title }}
                                </option>
                              @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)    
                                <option value="{{ $tag->id }}" 
                                    @foreach($productTags as $productTag)
                                        {{ ($tag->id == $productTag->tag_id) ? 'selected' : '' }}
                                    @endforeach
                                >   
                                    {{ $tag->title }}
                                </option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}"
                                    @foreach($colorProducts as $colorProduct)
                                        {{ ($color->id == $colorProduct->color_id) ? 'selected' : '' }}
                                    @endforeach
                                >
                                    {{ $color->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection