# Understanding Big O Notation

## 1. What is Big O Notation?

Big O notation expresses the upper bound of an algorithm's running time or space requirements in the worst-case scenario. It gives an idea of how the algorithm scales with the input size.

## 2. Common Big O Notations:

### O(1) - Constant Time:
- The running time of the algorithm is constant and does not depend on the input size.
- **Example**: Accessing an element in an array by index.

### O(log n) - Logarithmic Time:
- The running time grows logarithmically with the input size.
- **Example**: Binary search in a sorted array.

### O(n) - Linear Time:
- The running time grows linearly with the input size.
- **Example**: Iterating through an array.

### O(n log n) - Linearithmic Time:
- The running time grows linearly with an additional logarithmic factor.
- **Example**: Efficient sorting algorithms like Merge Sort and Quick Sort (average case).

### O(n^2) - Quadratic Time:
- The running time grows quadratically with the input size.
- **Example**: Bubble Sort, Insertion Sort.

### O(2^n) - Exponential Time:
- The running time grows exponentially with the input size.
- **Example**: Solving the Tower of Hanoi problem.

### O(n!) - Factorial Time:
- The running time grows factorially with the input size.
- **Example**: Solving the Traveling Salesman Problem using brute force.

## 3. How to Determine Big O Notation

To determine the Big O notation of an algorithm, follow these steps:

1. **Identify the basic operations**: Look for the fundamental operations that are repeated.
2. **Count the operations**: Determine how many times these operations are performed relative to the input size.
3. **Simplify the expression**: Remove constant factors and lower-order terms to find the dominant term.
