<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class IsNewOff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:is_new_off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎日0時に今日の新作をアップデートします';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Book $book)
    {
        $is_new_books = Book::where('is_new', true)->get();

        $is_new_off_books = [];
        foreach ($is_new_books as $book) {
            $is_new_off_books[] = [
                $book->is_new => false
            ];
        };

        DB::table('books')->insert($book);

        return Command::SUCCESS;
    }
}
