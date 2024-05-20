@extends('layouts.app-master')

@section('title', ucfirst('category'))

@section('page-name', ucfirst('تصنيفات المدونات'))



@section('app-content')



    @include('layouts._alert_session')

    @include('layouts._error_form')

    <div class="container" style="direction: rtl;">

        <table class="table">
            <thead class="text-center">
                <tr>
                    <th>اسم التصنيف</th>
                    <th>تم بواسطة</th>
                    <th>تاريخ الاضافة</th>
                    <th>الاجراءات</th>

                </tr>

            </thead>
            <tbody class="text-center">
                @foreach ($categories as $category)
                    <tr>
                        
                        <td>{{ $category->category_name }}</td>
 
    <td><a href="{{route('blogsbyuser',$category->username->id)}}">{{ $category->username->full_name }}</a></td>
 
                        

                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">


                            <form action="#" method="get" class="px-2">
                                @csrf
                                <button class=" px-2 btn btn-warning fw-bold border" type="submit"><span>More info</span></button>
                            </form>

                            <form action="{{ route('user.category.allowcategory', $category->id) }}" method="post"
                                class="px-2">
                                @csrf
                                @method('put')
                                <button class=" px-2 btn btn-success fw-bold border" type="submit"><span>Allow</span></button>
                            </form>

                            <form action="{{ route('user.category.rejectcategory', $category->id) }}" method="post"
                                class="px-2">
                                @csrf
                                @method('put')
                                <button class=" px-2 btn btn-danger fw-bold border" type="submit"><span>Reject</span></button>
                            </form>



                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
