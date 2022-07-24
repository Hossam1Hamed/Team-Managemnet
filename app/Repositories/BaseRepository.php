<?php   

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Traits\ApiTraits;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BaseRepository implements BaseRepositoryInterface 
{
    use ApiTraits;
    protected $model; 

    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        $data = $this->model->create($attributes);
        return $data;
    }

    public function update(array $attributes, $id, $request)
    {
        $model = $this->model->find($id);
        if (!isset($model)){
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }
            return abort($this->responseJsonFailed('Model Not Found', 404));
        }
        $data = $model->update($attributes);
        return $data;
    }

    public function find($id, $request ): ?Model
    {
        $model = $this->model->find($id);
        if (!isset($model)){
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }
            return abort($this->responseJsonFailed('Model Not Found', 404));
        }
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        //return $this->model->query()->get();
        return $this->model->all();
    }

    public function allWithPaginate($number = 15){
        return $this->model->paginate($number);
    }

    public function allWithPaginateExcept($id, $number = 15){
        return $this->model->where('id', '!=',  $id)->paginate($number);
    }

    public function destroy($id, $request)
    {
        $model = $this->model->find($id);
        if (!isset($model)){
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }
            return abort($this->responseJsonFailed('Model Not Found', 404));
        }
        return $model->delete();
    }

    public function groupBy($key){
        return $this->model->get()->groupBy($key)->toArray();
    }

    public function findBy($request , $field_name, $field){
        $model = $this->model->where($field_name, $field)->first();
        if (!isset($model)){
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }
            return abort($this->responseJsonFailed('Model Not Found', 404));
        }
        return $model;
    }
}
