<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

abstract class SearchController extends Controller
{
    // เมธอด abstract ที่ต้องกำหนดในคอนโทรลเลอร์ลูก
    abstract function getQuery() : Builder;

    // ตัวกรองโดยใช้คำค้นหา
    function filterByTerm(Builder|Relation $query, ?string $term): Builder|Relation
{
    if (!empty($term)) {
        $words = \preg_split('/\s+/', \trim($term));

        $query->where(function (Builder $innerQuery) use ($words) {
            foreach ($words as $word) {
                $innerQuery->where(function (Builder $subQuery) use ($word) {
                    $subQuery
                        ->where('name', 'LIKE', "%{$word}%")
                        ->orWhereHas('category', function (Builder $categoryQuery) use ($word) {
                            $categoryQuery->where('name', 'LIKE', "%{$word}%");
                        })
                        ->orWhereHas('user', function (Builder $userQuery) use ($word) {
                            $userQuery->where('name', 'LIKE', "%{$word}%");
                        });
                });
            }
        });
    }
    return $query;
}

    // เตรียมค่าที่จะใช้ค้นหา
    function prepareSearch(array $search) : array {
        $search['term'] = $search['term'] ?? null;
        return $search;
    }

    // ฟิลเตอร์โดยใช้คำค้นหา
    function filter(Builder|Relation $query, array $search) : Builder|Relation {
        return $this->filterByTerm($query, $search['term']);
    }

    // ค้นหาและคืนค่า query ที่ถูกกรองแล้ว
    function search(array $search) : Builder {
        $query = $this->getQuery();
        return $this->filter($query, $search);
    }
}


