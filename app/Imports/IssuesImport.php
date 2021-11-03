<?php

namespace App\Imports;

use App\Models\AllIssueImage;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IssuesImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {

        AllIssueImage::updateOrCreate([
            'issue_name' => $row['issue_name'],
            'issue_price' => $row['issue_price'],
            'issue_description' => $row['issue_description'],
            'model_id' => $row['model_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.issue_name' => ['', 'string', 'max:191'],
            '*.issue_description' => ['', 'string', 'max:191'],
        ];
    }
}