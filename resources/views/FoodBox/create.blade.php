<x-layout documentTitle="FoodBox create">
    <div class="container-fluid bg-header mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center shadow">
                <h1 class="display-1 mb-5 mt-5 font-p p-welcome">{{__('ui.creatFoodBox')}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12 bg-form-card rounded-4 shadow pb-2 border">
                <livewire:box-create />
            </div>
        </div>
    </div>
</x-layout>