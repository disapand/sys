@if(count($errors) > 0)
    @foreach($errors -> all() as $error)
        <template>
        <el-alert
                type="danger"
                title="{{ $error }}"
                show-icon>
        </el-alert>
    @endforeach
@endif