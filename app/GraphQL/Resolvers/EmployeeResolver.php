<?php

namespace App\GraphQL\Resolvers;

use App\Models\Employee;

class EmployeeResolver
{
    public function resolveEmployees($root, $args, $context, $info)
    {
        $perPage = $args['first'] ?? 10;
        $page = $args['page'] ?? 1;

        return Employee::paginate($perPage, ['*'], 'page', $page);
    }

    public function resolveEmployee($root, $args, $context, $info)
    {
        return Employee::findOrFail($args['id']);
    }
}
