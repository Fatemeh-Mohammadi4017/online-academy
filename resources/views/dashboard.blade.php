<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('داشبورد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="dashboard-content">
                
                  <p class="dashboard-welcome"> {{auth()->user()->name}}خوش امدید </p> 

            <!-- نقش معلم -->

    @if(auth()->user()->role === 'teacher')
    <h3 class="dashboard-role">داشبورد مدرس</h3>
 <!-- کارت تعداد کل دوره  -->
    <div class="dashboard-cards">
        <div class="dashboard-card">
    <h3>تعداد دوره‌ها:</h3>
       <p> {{ auth()->user()->coursesAsTeacher()->count() }}</p>
     </div>
        </div>
        <!-- ردیف تعداد درس های دوره ها  -->
        <h3 class=""dashboard-section-title>تعداد درس های دوره</h3>
        <div class="dashboard-cards">
        @foreach (auth()->user()->coursesAsTeacher as $course)
       <div class="dashboard-card">
        <h3>{{$course->name}}</h3>
        <p>{{$course->lessons()->count()}}درس </p>
       </div>
        @endforeach
        </div>
    <!-- ردیف تعداد دانش اموزان دوره ها -->
     <h3 class=""dashboard-section-title> تعداد دانش اموزان دوره</h3>
     <div class="dashboard-cards">
    @foreach (auth()->user()->coursesAsTeacher as $course)
    <div class="dashboard-card">
    <h3> {{ $course->name }}</h3>
    <p>{{$course->students()->count()}}دانش اموز</p>
    </div>
    @endforeach
    </div>
            <!-- نقش مدیر -->

    @elseif(auth()->user()->role === 'admin')

    <h3 class="dashboard-role">داشبورد مدیر</h3>

    <div class="dashboard-cards">

        <div class="dashboard-card">
            <h3>تعداد کاربران</h3>
            <p>{{ $totalUsers }}</p>
        </div>

        <div class="dashboard-card">
            <h3>تعداد دوره‌ها</h3>
            <p>{{ $totalCourses }}</p>
        </div>

        <div class="dashboard-card">
            <h3>تعداد درس‌ها</h3>
            <p>{{ $totalLessons }}</p>
        </div>
    </div>   
    <h3 class="dashboard-role">معلمان</h3>

<div class="dashboard-cards">
    @foreach ($teachers as $teacher)
        <div class="dashboard-card">
            <h3>{{ $teacher->name }}</h3>
            <h3>تعداد دوره:{{$teacher->coursesAsTeacher->count()}}</h3>
             @foreach ( $teacher->coursesAsTeacher as $course)
                 <p>دوره {{$course->name}}</p>
                 @endforeach
        </div>
    @endforeach
</div>
<h3 class="dashboard-role">دانش اموزان</h3>

<div class="dashboard-cards">
    @foreach ($students as $student)
        <div class="dashboard-card">
            <h3>{{ $student->name }}</h3>
            <h3>تعداد دوره ها :{{$student->coursesAsStudent->count()}}</h3>
            @foreach ( $student->coursesAsStudent as $course)
                 <p>دوره {{$course->name}}</p>
            @endforeach
           
        </div>
    @endforeach
</div>
                             
     
        

            <!-- نقش دانش اموز -->

@elseif(auth()->user()->role === 'student')

    <h3 class="dashboard-role">داشبورد دانش‌آموز</h3>
    <!-- تعداد دوره ها  -->
    <div class="dashboard-cards">
        <div class="dashboard-card">
     <h3>تعداد دوره ها</h3>
      <p>{{auth()->user()->coursesAsStudent()->count() }}</p>
        </div>
    </div>
    <h3 class=""dashboard-section-title>دوره های من</h3>
     <div class="dashboard-cards">
     @foreach (auth()->user()->coursesAsStudent as $course)
     <div class="dashboard-card">
     <h3 class="dashboard-course-title"><a class="dashboard-course-link" href="{{route('courses.show',$course->id)}}">{{$course->name}}</a></h3>
    <p class="dashboard-lesson-title">درس های دوره:</p>
        @foreach ($course->lessons as $lesson)
        <p class="dashboard-lesson">{{$lesson->topic}}</p>
        @endforeach
    </div>
    @endforeach
                    </div>
    

@endif
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
