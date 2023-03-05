package model;

abstract public class DynamicArray<T> implements IArray<T> {
    protected Object[] array;

    @Override
    public void add(T item, int index) {
        if (size() == array.length)
            resize();
        System.arraycopy(array, index, array, index + 1, size());
        array[index] = item;
    }

    @Override
    public T remove(int index) {
        T item = (T)array[index];
        System.arraycopy(array, index + 1, array, index, size() - index);
        array[size()] = null;
        return item;
    }

    abstract public int size();
    abstract protected void resize();
}
