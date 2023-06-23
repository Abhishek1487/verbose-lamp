import numpy as np

# Define the proposal distribution q
q = np.array([[0.0, 0.797, 0.0, 0.203],
              [0.0, 0.5675, 0.189, 0.02435],
              [0.0, 0.0, 0.8026, 0.1973],
              [0.1, 0.0, 0.0, 0.99]])

# Define the target distribution pi
pi = np.array([0.0072358, 0.02894323, 0.4004, 0.56342056])

# Calculate the transition probabilities
P = np.zeros((4, 4))
for i in range(4):
    for j in range(4):
        if i == j:
            P[i, j] = 1.0 - np.sum(q[:, i])
        else:
            P[i, j] = q[j, i] * pi[i] / (q[i, j] * pi[j])

# Multiply P by pi
result = np.dot(P, pi)

print(result)
