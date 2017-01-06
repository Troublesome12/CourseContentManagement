<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('courses')->delete();
        
        Course::create(['course_code' => 'MATH 003', 'course_name' => 'Elementary Calculus', 'department' => 'eee']);
        Course::create(['course_code' => 'PHY 101', 'course_name' => 'Physics I', 'department' => 'eee']);
        Course::create(['course_code' => 'MATH 151', 'course_name' => 'Differential and Integral Calculus', 'department' => 'eee']);
        Course::create(['course_code' => 'PHY 103', 'course_name' => 'Physics II', 'department' => 'eee']);
        Course::create(['course_code' => 'EEE 101', 'course_name' => 'Electrical Circuits I', 'department' => 'eee']);
        Course::create(['course_code' => 'EEE 103', 'course_name' => 'Electrical Circuits II', 'department' => 'eee']);
        Course::create(['course_code' => 'ACT 111', 'course_name' => 'Financial and Managerial Accounting', 'department' => 'eee']);
        Course::create(['course_code' => 'MATH 155', 'course_name' => 'Ordinary and Partial Differential Equations', 'department' => 'eee']);
        Course::create(['course_code' => 'EEE 105', 'course_name' => 'Electronics I', 'department' => 'eee']);
        Course::create(['course_code' => 'CHEM 101', 'course_name' => 'Chemistry', 'department' => 'eee']);
        Course::create(['course_code' => 'MATH 203', 'course_name' => 'Linear Algebra and Matrices', 'department' => 'eee']);
        Course::create(['course_code' => 'SOC 101', 'course_name' => 'Society, Technology and Engineering Ethics', 'department' => 'eee']);
        Course::create(['course_code' => 'MATH 201', 'course_name' => 'Coordinate geometry and vector analysis', 'department' => 'eee']);
        Course::create(['course_code' => 'EEE 207', 'course_name' => 'Electronics II', 'department' => 'eee']);
        Course::create(['course_code' => 'EEE 203', 'course_name' => 'Energy Conversion I', 'department' => 'eee']);


        Course::create(['course_code' => 'CSI 121', 'course_name' => 'Structured Programming Language', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 122', 'course_name' => 'Structured Programming Language Lab', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 219', 'course_name' => 'Discrete Mathematics', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 124', 'course_name' => 'Advanced Programming Lab', 'department' => 'cse']);
        Course::create(['course_code' => 'MATH 151', 'course_name' => 'Differential and Integral Calculus', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 227', 'course_name' => 'Algorithms', 'department' => 'cse']);
        Course::create(['course_code' => 'MATH 187', 'course_name' => 'Fourier and Laplace Trans. & Complex Variables', 'department' => 'cse']);
        Course::create(['course_code' => 'CSE 123', 'course_name' => 'Electronics', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 229', 'course_name' => 'Numerical Methods', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 221', 'course_name' => 'Object Oriented Programming', 'department' => 'cse']);
        Course::create(['course_code' => 'CSE 313', 'course_name' => 'Computer Architecture', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 233', 'course_name' => 'Theory of Computing', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 309', 'course_name' => 'Operating System Concepts', 'department' => 'cse']);
        Course::create(['course_code' => 'CSE 315', 'course_name' => 'Data Communication', 'department' => 'cse']);
        Course::create(['course_code' => 'CSI 221', 'course_name' => 'Database Management Systems', 'department' => 'cse']);
        
        Course::create(['course_code' => 'ACN 1205', 'course_name' => 'Financial Accounting I', 'department' => 'bba']);
        Course::create(['course_code' => 'ACN 1309', 'course_name' => 'Financial Accounting II', 'department' => 'bba']);
        Course::create(['course_code' => 'ACN 2215', 'course_name' => 'Management Accounting', 'department' => 'bba']);
        Course::create(['course_code' => 'BMT 2113', 'course_name' => 'Business Mathematics II', 'department' => 'bba']);
        Course::create(['course_code' => 'BST 1308', 'course_name' => 'Business Statistics I', 'department' => 'bba']);
        Course::create(['course_code' => 'BST 2216', 'course_name' => 'Business Statistics II', 'department' => 'bba']);
        Course::create(['course_code' => 'BUS 1102', 'course_name' => 'Introduction to Business', 'department' => 'bba']);
        Course::create(['course_code' => 'BUS 2112', 'course_name' => 'Business Communications', 'department' => 'bba']);
        Course::create(['course_code' => 'ECN 2111', 'course_name' => 'Microeconomics', 'department' => 'bba']);
        Course::create(['course_code' => 'ECN 2214', 'course_name' => 'Macroeconomics', 'department' => 'bba']);
        Course::create(['course_code' => 'FIN 2319', 'course_name' => 'Principles of Finance', 'department' => 'bba']);
        Course::create(['course_code' => 'FIN 3123', 'course_name' => 'Managerial Finance', 'department' => 'bba']);
        Course::create(['course_code' => 'FIN 3337', 'course_name' => 'Principles of Banking and Insurance', 'department' => 'bba']);
        Course::create(['course_code' => 'IBS 3121', 'course_name' => 'International Business', 'department' => 'bba']);
        Course::create(['course_code' => 'LAW 4151', 'course_name' => 'Business Law', 'department' => 'bba']);
    }
}
