@foreach(['error', 'warning', 'info', 'success'] as $msg)
    @if( session() -> has($msg))
        <template>
            <el-alert
            title="{{ session() -> get($msg) }}"
            type="{{ $msg }}"
            center
            show-icon>
            </el-alert>
        </template>
    @endif
@endforeach