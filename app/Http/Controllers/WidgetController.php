<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Throwable;

class WidgetController extends Controller
{
    public function append(Request $request){
        try{
            $widget = $request->get('widget');
            $renderWidget = view('restricted.layouts.widgets.table.'.$widget.'.components.layout')->render();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Widget rendered successfully',
                'html'      => $renderWidget
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error rendering widget',
                'error'     => $exception->getMessage()
            ],402);
        }
    }
    public function widgetsCategories(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('categories');
            $sort = $request->get('sort');
            $categories = (new Category)->newQuery();
            $categories->whereNot('id',1);
            if($search){
                $categories->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $categories->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $categories->orderBy($sort['column'],$sort['order']);
            }else{
                $categories->orderBy('id','desc');
            }
            $categories = $categories->paginate(10);
            $renderTable = view('restricted.layouts.widgets.table.categories.components.list', ['tableData' => $categories])->render();
            $renderTablePagination = view('restricted.layouts.widgets.table.categories.components.pagination', ['tableData' => $categories])->render();
            return response()->json([
                'status'        => 'success',
                'message'       => 'TableBased data fetched successfully',
                'html'          => $renderTable,
                'pagination'    => $renderTablePagination,
                'totalCount'    => (new Category)->count()
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching categories data',
                'error'     => $exception->getMessage()
            ],402);
        } catch (Throwable $e) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching categories data',
                'error'     => $e->getMessage()
            ],402);
        }
    }
    public function widgetsTags(Request $request){
        try{
            $search = $request->get('search');
            $filters = $request->get('filters');
            $getTableColumnsFromSchema = Schema::getColumnListing('tags');
            $sort = $request->get('sort');
            $tags = (new Tag)->newQuery();
            $tags->whereNot('id',1);
            if($search){
                $tags->where(function($query) use ($search, $getTableColumnsFromSchema){
                    foreach($getTableColumnsFromSchema as $column){
                        $query->orWhere($column, 'like', '%'.$search.'%');
                    }
                });
            }
            if($filters){
                foreach($filters as $filter){
                    foreach($filter as $column => $value){
                        if($value === 'all') continue;
                        $tags->where($column,'=', $value);
                    }
                }
            }
            if($sort){
                $tags->orderBy($sort['column'],$sort['order']);
            }else{
                $tags->orderBy('id','desc');
            }
            $tags = $tags->paginate(10);
            $renderTable = view('restricted.layouts.widgets.table.tags.components.list', ['tableData' => $tags])->render();
            $renderTablePagination = view('restricted.layouts.widgets.table.tags.components.pagination', ['tableData' => $tags])->render();
            return response()->json([
                'status'        => 'success',
                'message'       => 'Table Based | Tags | data fetched successfully',
                'html'          => $renderTable,
                'pagination'    => $renderTablePagination,
                'totalCount'    => (new Tag)->count()
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching tags data',
                'error'     => $exception->getMessage()
            ],402);
        } catch (Throwable $e) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error fetching tags data',
                'error'     => $e->getMessage()
            ],402);
        }
    }
}
