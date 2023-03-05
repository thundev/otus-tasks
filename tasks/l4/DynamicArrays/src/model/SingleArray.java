package model;

import java.util.Arrays;

public class SingleArray<T> implements IArray<T> {

    private Object[] array;

    public SingleArray () {
        array = new Object[0];
    }

    @Override
    public int size() {
        return array.length;
    }

    @Override
    public void add(T item) {
        Object[] newArray = new Object[size() + 1];
        System.arraycopy(array, 0, newArray, 0, size());
        array = newArray;
        array[size() - 1] = item;
    }

    @Override
    public void add(T item, int index) {
        Object[] newArray = new Object[size() + 1];
        System.arraycopy(array, 0, newArray, 0, index);
        System.arraycopy(array, index, newArray, index + 1, size() - index);
        newArray[index] = item;

        array = newArray;
    }

    @Override
    @SuppressWarnings("unchecked")
    public T get(int index) {
        return (T)array[index];
    }

    @Override
    public T remove(int index) {
        T item = (T)array[index];

        int newSize = size() - 1;
        Object[] newArray = new Object[newSize];
        System.arraycopy(array, 0, newArray, 0, index);
        System.arraycopy(array, index + 1, newArray, index, newSize - index);

        array = newArray;

        return item;
    }

    @Override
    public String toString() {
        return "SingleArray{" +
                "array=" + Arrays.toString(array) +
                '}';
    }
}
