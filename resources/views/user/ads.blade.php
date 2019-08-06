@extends('user.layout')
@section('user_section')
<div class="page-content">
    <div class="inner-box">
        <div class="dashboard-box">
            <h2 class="dashbord-title">Mis anuncios</h2>
        </div>
        <div class="dashboard-wrapper">
            <nav class="nav-table">
                <ul>
                    <li class="active"><a href="#">Todos ({{ $total_active_ads }})</a></li>
                    <li><a href="#">Activos ()</a></li>
                    <li><a href="#">Promovidos ()</a></li>
                    <li><a href="#">Inactivos ()</a></li>
                    <li><a href="#">Expirados ()</a></li>
                    <li>
                        <select class="form-control" name="category_id" onchange="this.options[this.selectedIndex].value && (window.location = '{{ URL::current() }}?category_id=' + this.options[this.selectedIndex].value);">
                            <option value="">Agrupar Categoría</option>
                            @foreach($parent_categories as $super_category)
                            <optgroup label="{{ $super_category->description->name }}">
                                @foreach($category_formatted[$super_category->id] as $category)
                                @if(Request::input('category_id') == $category->category_id)
                                <option value="{{ $category->category_id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </li>
                </ul>
            </nav>
            <table class="table {{-- table-responsive --}} dashboardtable tablemyads">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Precio</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Ajustes</th>
                    </tr>
                </thead>
                <tbody>
                    @if($my_ads)
                    @foreach($my_ads as $ad)
                    <tr data-category="active">
                        <td class="photo">
                            <img class="img-fluid lazyload" src="{{ ad_first_image($ad) }}" alt="{{ $ad->description->title }}">
                        </td>
                        <td data-title="Price">
                            <h3>{{ ad_price($ad) }}</h3>
                        </td>
                        <td data-title="Title">
                            <a href="{{ ad_url($ad) }}">
                                <h3>{{ $ad->description->title }}</h3>
                            </a>
                            <span>ID: {{ $ad->id }}</span>
                        </td>
                        <td data-title="Category"><span class="adcategories"><a href="{{ ad_category_url($ad) }}"><i class="lni-{{ $ad->category->description->icon }}"></i> {{ $ad->category->description->name }}</a></span></td>
                        <!-- adstatusactive/adstatusinactive/adstatussold-->
                        <td data-title="Ad Status"><span class="adstatus adstatusactive">activo</span></td>
                        <td data-title="Action">
                            <div class="btns-actions">
                                <!-- <a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a> Analiticas -->
                                <a class="btn-action btn-edit" href="{{ route('ad.edit', ['ad' => $ad]) }}"><i class="lni-pencil"></i></a>
                                <a class="btn-action btn-delete" href="{{ route('ad.destroy', ['ad' => $ad]) }}"><i class="lni-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{ $my_ads->links() }}
        </div>
    </div>
</div>
@endsection