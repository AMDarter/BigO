import matplotlib.pyplot as plt
import numpy as np
import math

# Define the range for input size
n = np.linspace(1, 20, 100)

# Define the functions for different Big O notations
O_1 = np.ones_like(n)
O_log_n = np.log(n)
O_n = n
O_n_log_n = n * np.log(n)
O_n_squared = n ** 2
O_2_n = 2 ** n
# Limit the range for factorial to avoid overflow
n_factorial = np.linspace(1, 10, 10)
O_n_factorial = np.array([math.factorial(int(i)) for i in n_factorial])

# Create the plot
plt.figure(figsize=(12, 8))

# Plot each function with appropriate labels
plt.plot(n, O_1, label="O(1) - Constant Time")
plt.plot(n, O_log_n, label="O(log n) - Logarithmic Time")
plt.plot(n, O_n, label="O(n) - Linear Time")
plt.plot(n, O_n_log_n, label="O(n log n) - Linearithmic Time")
plt.plot(n, O_n_squared, label="O(n^2) - Quadratic Time")
plt.plot(n, O_2_n, label="O(2^n) - Exponential Time")
plt.plot(n_factorial, O_n_factorial, label="O(n!) - Factorial Time", linestyle='dashed')

# Set plot titles and labels
plt.ylim(1, 1e7)  # Adjust the y-axis limit for better visualization
plt.yscale('log')  # Use logarithmic scale for better visualization
plt.title("Big O Notation Time Complexities")
plt.xlabel("Input Size (n)")
plt.ylabel("Operations Count")
plt.legend()

# Show the plot
plt.grid(True)
plt.show()
