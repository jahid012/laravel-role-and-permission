@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="text-align: right">
                    @can('Post create')
                        <a href="{{route('admin.posts.create')}}" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">New post</a>
                    @endcan
                </div>
            </div>
  
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                @can('Post access')
                  @foreach($posts as $post)
                  <tr class="hover:bg-grey-lighter">
                    <td scope="col">{{ $post->title }}</td>
                    <td scope="col">
                        @if($post->publish)
                        <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Publish</span>
                        @else
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                        @endif
                    </td>
                    <td scope="col" class="text-right">
  
                      @can('Post edit')
                      <a href="{{route('admin.posts.edit',$post->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('Post delete')
                      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                          @csrf
                          @method('delete')
                          <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @endforeach
                  @endcan
              </tbody>
            </table>
  
            @can('Post access')
            <div class="text-right p-4 py-10">
              {{ $posts->links() }}
            </div>
            @endcan
          </div>
  
        </div>
    </div>
  </div>

@endsection